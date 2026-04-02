export default function Checkbox({ children, className = "", ...props }) {
    return (
        <label className="flex gap-2 items-center cursor-pointer">
            <input
                {...props}
                type="checkbox"
                className={
                    "rounded border-gray-300 text-primaryRed-600 shadow-sm focus:ring-primaryRed-600 " +
                    className
                }
            />
            {children && <span>{children}</span>}
        </label>
    );
}
