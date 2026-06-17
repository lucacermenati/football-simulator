import { useRef } from "react";
import TextInput from "@/Components/TextInput";

export default function Searchbar({
    placeholder = "Search...",
    onSearch,
    className,
    delay = 300,
    ...props
}) {
    const timeoutRef = useRef(null);

    const handleChange = (e) => {
        const value = e.target.value;

        if (timeoutRef.current) {
            clearTimeout(timeoutRef.current);
        }

        timeoutRef.current = setTimeout(() => {
            onSearch(value);
        }, delay);
    };

    return (
        <TextInput
            onChange={handleChange}
            className={`w-64 ${className}`}
            placeholder={placeholder}
            {...props}
        />
    );
}
