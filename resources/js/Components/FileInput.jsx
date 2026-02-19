import { useEffect, useRef, useState } from "react";
import PrimaryButton from "@/Components/PrimaryButton";

export default function FileInput({
    id,
    name,
    accept,
    disabled = false,
    className = "",
    buttonLabel = "Upload logo",
    existingUrl = null, // string|null (logo già salvato)
    existingLabel = "Current logo",
    newLabel = "New file selected",
    removeLabel = "Remove selected file", // unico bottone remove
    onChange, // ({ file, remove }) => void
}) {
    const inputRef = useRef(null);

    const [file, setFile] = useState(null); // File|null
    const [remove, setRemove] = useState(false); // boolean
    const [objectUrl, setObjectUrl] = useState(null); // string|null

    const hasNewFile = file instanceof File;

    useEffect(() => {
        if (!(file instanceof File)) {
            if (objectUrl) URL.revokeObjectURL(objectUrl);
            setObjectUrl(null);
            return;
        }

        const url = URL.createObjectURL(file);

        if (objectUrl) URL.revokeObjectURL(objectUrl);
        setObjectUrl(url);

        return () => URL.revokeObjectURL(url);
    }, [file]);

    const shouldShowExisting = !!existingUrl && !remove;
    const previewUrl = objectUrl || (shouldShowExisting ? existingUrl : null);
    const statusLabel = hasNewFile ? newLabel : existingLabel;

    const emit = (nextFile, nextRemove) => {
        onChange?.({ file: nextFile, remove: nextRemove });
    };

    const handleUploadClick = () => {
        if (disabled) return;
        inputRef.current?.click();
    };

    const handleFileChange = (e) => {
        const nextFile = e.target.files?.[0] ?? null;
        setFile(nextFile);
        emit(nextFile, remove);
    };

    const handleRemove = () => {
        if (inputRef.current) inputRef.current.value = "";
        setFile(null);
        setRemove(true);
        emit(null, true);
    };

    return (
        <div className={className}>
            <input
                ref={inputRef}
                id={id}
                name={name}
                type="file"
                accept={accept}
                disabled={disabled}
                className="hidden"
                onChange={handleFileChange}
            />

            {/* Preview */}
            {previewUrl && (
                <div className="flex gap-3 items-center mt-2">
                    <img
                        src={previewUrl}
                        alt="Logo preview"
                        className="object-contain w-16 h-16 bg-white rounded"
                    />
                    <div className="text-sm text-darkGrey-600">
                        {statusLabel}
                    </div>
                </div>
            )}

            <div className="flex gap-3 items-center mt-2">
                <PrimaryButton
                    type="button"
                    onClick={handleUploadClick}
                    disabled={disabled}
                >
                    {buttonLabel}
                </PrimaryButton>

                {previewUrl && (
                    <button
                        type="button"
                        disabled={disabled}
                        className="text-sm underline text-darkGrey-600 disabled:opacity-50"
                        onClick={handleRemove}
                    >
                        {removeLabel}
                    </button>
                )}
            </div>
        </div>
    );
}
