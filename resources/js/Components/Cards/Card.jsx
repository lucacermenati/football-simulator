export default function Card({ className = "", onClick, children, ...props }) {
    return (
        <div
            onClick={onClick}
            className={
                "flex overflow-hidden flex-col w-44 h-44 bg-white shadow-sm sm:rounded-lg " +
                (onClick ? "hover:cursor-pointer hover:bg-gray-50 " : "") +
                className
            }
            {...props}
        >
            {children}
        </div>
    );
}
