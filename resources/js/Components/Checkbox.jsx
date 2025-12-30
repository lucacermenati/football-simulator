export default function Checkbox({ className = "", ...props }) {
    return (
        <input
            {...props}
            type="checkbox"
            className={
                "rounded border-gray-300 text-primaryRed-600 shadow-sm focus:ring-primaryRed-600 " +
                className
            }
        />
    );
}
