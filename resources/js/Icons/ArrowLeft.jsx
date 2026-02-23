export default function ArrowLeft({ className = "w-5 h-5", ...props }) {
    return (
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            className={className}
            {...props}
        >
            <path
                d="M15 6l-6 6 6 6"
                strokeWidth="2"
                strokeLinecap="round"
                strokeLinejoin="round"
            />
        </svg>
    );
}
