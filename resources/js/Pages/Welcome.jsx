import { Head, Link } from "@inertiajs/react";

export default function Welcome({ auth, laravelVersion, phpVersion }) {
    const handleImageError = () => {
        document
            .getElementById("screenshot-container")
            ?.classList.add("!hidden");
        document.getElementById("docs-card")?.classList.add("!row-span-1");
        document
            .getElementById("docs-card-content")
            ?.classList.add("!flex-row");
    };

    return (
        <>
            <Head title="Welcome" />
            <div className="w-screen h-screen bg-[url('/background.svg')] bg-no-repeat bg-cover bg-center text-black/50 dark:bg-black dark:text-white/50">
                <img
                    src="/logo.svg"
                    alt="Logo"
                    className="mx-auto mt-10 w-32 h-32"
                />
            </div>
        </>
    );
}
