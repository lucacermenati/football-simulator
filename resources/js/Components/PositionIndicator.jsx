import clsx from "clsx";
import { POSITION } from "@/Enum/position";

export default function PositionIndicator({
    children,
    position,
    size = 6,
    className,
    ...props
}) {
    const boxSize = `w-${size} h-${size}`;
    return (
        <div
            className={clsx(
                "rounded-full flex justify-center items-center text-white",
                boxSize,
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
