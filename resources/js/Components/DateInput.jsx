import { forwardRef, useEffect, useImperativeHandle, useRef } from "react";

export default forwardRef(function DateInput(
    { className = "", isFocused = false, ...props },
    ref,
) {
    const localRef = useRef(null);

    useImperativeHandle(ref, () => ({
        focus: () => localRef.current?.focus(),
    }));

    useEffect(() => {
        if (isFocused) {
            localRef.current?.focus();
        }
    }, [isFocused]);

    return (
        <input
            {...props}
            type="date"
            className={
                "rounded-md border-gray-300 shadow-sm focus:border-lightGrey-600 focus:ring-lightGrey-800 " +
                className
            }
            ref={localRef}
        />
    );
});
