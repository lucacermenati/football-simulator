import clsx from "clsx";
import * as Flags from "country-flag-icons/react/3x2";

export default function Flag({
    nationality = null,
    size = 8,
    className = "",
    ...props
}) {
    const sizes = {
        6: "w-6 h-6",
        8: "w-8 h-8",
        10: "w-10 h-10",
        12: "w-12 h-12",
        16: "w-16 h-16",
    };

    const CountryFlag = Flags[nationality];

    return (
        <div
            className={clsx(
                "flex overflow-hidden justify-center items-center rounded-full border border-lightGrey-600 shrink-0",
                sizes[size],
                className,
            )}
            {...props}
        >
            {CountryFlag ? (
                <CountryFlag className="h-full scale-150" />
            ) : (
                <img
                    src={"images/null-flag.svg"}
                    alt="No flag"
                    className="h-full scale-150"
                />
            )}
        </div>
    );
}
