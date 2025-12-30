import { Link } from "@inertiajs/react";

export default function ResponsiveNavLink({
    active = false,
    className = "",
    children,
    ...props
}) {
    return (
        <Link
            {...props}
            className={`flex w-full items-start border-l-4 py-2 pe-4 ps-3 ${
                active
                    ? "text-primaryRed-600 border-primaryRed-600 bg-primaryRed-600 focus:border-primaryRed-600 focus:bg-primaryRed-600 focus:text-primaryRed-600"
                    : "border-transparent text-darkGrey-600 hover:border-lightGrey-800 hover:bg-lightGrey-600 hover:text-darkGrey-600 focus:border-lightGrey-800 focus:bg-lightGrey-600 focus:text-darkGrey-600"
            } text-base font-medium transition duration-150 ease-in-out focus:outline-none ${className}`}
        >
            {children}
        </Link>
    );
}
