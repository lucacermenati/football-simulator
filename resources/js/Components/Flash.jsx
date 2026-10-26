import { usePage } from "@inertiajs/react";
import { useEffect, useState } from "react";
import clsx from "clsx";

const styles = {
    success: "bg-green-100 border-green-400 text-green-800",
    error: "bg-red-100 border-red-400 text-red-800",
};

export default function Flash() {
    const { flash } = usePage().props;
    const [visible, setVisible] = useState(null);

    useEffect(() => {
        const type = Object.keys(styles).find((key) => flash?.[key]);

        if (!type) return;

        setVisible({ type, message: flash[type] });

        const timeout = setTimeout(() => setVisible(null), 4000);

        return () => clearTimeout(timeout);
    }, [flash]);

    if (!visible) return null;

    return (
        <div className="px-4 mx-auto mt-4 max-w-7xl sm:px-6 lg:px-8">
            <div
                role="alert"
                className={clsx(
                    "flex justify-between items-center px-4 py-3 rounded-md border",
                    styles[visible.type],
                )}
            >
                <span>{visible.message}</span>
                <button
                    type="button"
                    className="ml-4 font-bold"
                    onClick={() => setVisible(null)}
                >
                    ×
                </button>
            </div>
        </div>
    );
}
