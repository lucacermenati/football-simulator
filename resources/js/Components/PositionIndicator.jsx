import clsx from "clsx";
import { POSITION } from "@/Enum/position";

export default function PositionIndicator({
    children,
    position,
    size = 6,
    className,
    ...props
}) {
    const sizes = {
        6: "w-6 h-6",
        8: "w-8 h-8",
        10: "w-10 h-10",
        12: "w-12 h-12",
        16: "w-16 h-16",
    };

    return (
        <div
            className={clsx(
                "rounded-full flex justify-center items-center text-white",
                sizes[size],
                className,
                position === POSITION.GOALKEEPER
                    ? "bg-position-Goalkeeper"
                    : position === POSITION.DEFENDER
                      ? "bg-position-Defender"
                      : position === POSITION.MIDFIELDER
                        ? "bg-position-Midfielder"
                        : position === POSITION.FORWARD
                          ? "bg-position-Forward"
                          : "bg-lightGrey-800",
            )}
            {...props}
        >
            {children}
        </div>
    );
}
