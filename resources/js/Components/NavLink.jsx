import { Link } from "@inertiajs/react";

export default function NavLink({
    active = false,
    className = "",
    children,
    ...props
}) {
    return (
        <Link
            {...props}
            className={
                "inline-flex items-center border-b-2 px-1 pt-1 text-sm font-medium leading-5 transition duration-150 ease-in-out focus:outline-none " +
                (active
                    ? "border-primaryRed-600 text-darkGrey-600 focus:border-primaryRed-600"
                    : "border-transparent text-darkGrey-600 hover:border-lightGrey-800 hover:text-darkGrey-600 focus:border-lightGrey-800 focus:text-darkGrey-600") +
                className
            }
        >
            {children}
        </Link>
    );
}
