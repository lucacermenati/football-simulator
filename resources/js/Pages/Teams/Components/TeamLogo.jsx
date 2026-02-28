export default function TeamLogo({ team, className = "" }) {
    return team.logo ? (
        <img
            className={`rounded-full border-2 w-min-8 h-min-8 border-lightGray-600 ${className}`}
            src={team.logo}
            alt=""
        />
    ) : (
        <div
            className={`rounded-full border-2 w-min-8 h-min-8 ${className} border-lightGray-600`}
            style={{
                background: `linear-gradient(to right, ${team.first_color} 50%, ${team.second_color} 50%)`,
            }}
        />
    );
}
