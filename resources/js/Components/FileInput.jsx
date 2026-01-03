import { useRef, useState, useEffect } from "react";
import Cross from "@/Icons/Cross";
import PrimaryButton from "@/Components/PrimaryButton";

export default function FileInput({
    id,
    name,
    accept,
    disabled = false,
    className = "",
    buttonLabel = "Upload file",
    onChange,
    initialFileName = "",
}) {
    const inputRef = useRef(null);
    const [fileName, setFileName] = useState(initialFileName);

    useEffect(() => {
        setFileName(initialFileName || "");
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, [initialFileName]);

    const handleButtonClick = () => {
        if (disabled) return;
        inputRef.current?.click();
    };

    const handleInputChange = (e) => {
        const file =
            e.target.files && e.target.files[0] ? e.target.files[0] : null;
        setFileName(file ? file.name : "");
        if (onChange) onChange(file);
    };

    const handleClear = () => {
        if (inputRef.current) {
            inputRef.current.value = "";
        }
        setFileName("");
        if (onChange) onChange(null);
    };

    return (
        <div className={"flex items-center gap-3 " + className}>
            <input
                ref={inputRef}
                id={id}
                name={name}
                type="file"
                accept={accept}
                disabled={disabled}
                className="hidden"
                onChange={handleInputChange}
            />

            <PrimaryButton
                type="button"
                onClick={handleButtonClick}
                disabled={disabled}
            >
                {buttonLabel}
            </PrimaryButton>

            {fileName && (
                <div className="flex items-center gap-2 min-w-0">
                    <span
                        className="truncate text-sm text-gray-700 max-w-[16rem]"
                        title={fileName}
                    >
                        {fileName}
                    </span>
                    <button
                        type="button"
                        onClick={handleClear}
                        className="flex items-center justify-center rounded-md p-1 text-gray-500 hover:text-gray-700 hover:bg-gray-100"
                        aria-label="Clear file"
                    >
                        <Cross className="w-4 h-4" />
                    </button>
                </div>
            )}
        </div>
    );
}
