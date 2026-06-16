import * as Flags from "country-flag-icons/react/3x2";

export default function Flag({
    nationality = null,
    size = 8,
    className = "",
    ...props
}) {
    const boxSize = `w-${size} h-${size}`;

    const CountryFlag = Flags[nationality];

    return (
        <div
            className={`flex overflow-hidden justify-center items-center rounded-full border border-lightGrey-600 shrink-0 ${boxSize} ${className}`}
            {...props}
        >
            {CountryFlag ? (
                <CountryFlag className="h-full scale-150" />
            ) : (
                <img
                    src={"images/flags/null.svg"}
                    alt="No flag"
                    className="h-full scale-150"
                />
            )}
        </div>
    );
}
