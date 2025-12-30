export default function SecondaryButton({
    type = "button",
    className = "",
    disabled,
    children,
    ...props
}) {
    return (
        <button
            {...props}
            type={type}
            className={
                `inline-flex items-center rounded-md border border-lightGray-700 bg-lightGray-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-darkGray-600 shadow-sm transition duration-150 ease-in-out hover:bg-lightGray-700 focus:outline-none focus:ring-2 focus:ring-lightGray-800 focus:ring-offset-2 disabled:opacity-25 ${
                    disabled && "opacity-25"
                } ` + className
            }
            disabled={disabled}
        >
            {children}
        </button>
    );
}
