import Card from "@/Components/Cards/Card";

export default function CompetitionCard({
    competition,
    onClick,
    className = "",
    ...props
}) {
    const src = competition.logo || "/competition-placeholder.svg";
    const alt = competition.name;

    return (
        <Card
            onClick={onClick}
            className={`items-center ${className}`}
            {...props}
        >
            <div className="flex-1 min-h-0">
                <img
                    className="object-contain w-full h-full"
                    src={src}
                    alt={alt}
                />
            </div>
            <div className="p-2">{competition.name}</div>
        </Card>
    );
}
