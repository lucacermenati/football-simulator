import clsx from "clsx";

export default function TeamLogo({ team, size = 8, className = "" }) {
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
                "flex justify-center items-center",
                sizes[size],
                className,
            )}
        >
            {team.logo ? (
                <img
                    src={team.logo}
                    alt={`${team.name} logo`}
                    className="object-contain max-w-full max-h-full"
                />
            ) : (
                <div
                    className="w-full h-full rounded-full border-2 border-lightGray-600"
                    style={{
                        background: `linear-gradient(to right, ${team.first_color} 50%, ${team.second_color} 50%)`,
                    }}
                />
            )}
        </div>
    );
}
