export default function TeamLogo({ team, size = 8, className = "" }) {
    const boxSize = `w-${size} h-${size}`;

    return (
        <div
            className={`flex justify-center items-center ${boxSize} shrink-0 ${className}`}
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
