import Card from "@/Components/Cards/Card";

export default function CompetitionCard({
    name,
    imageSrc,
    onClick,
    className = "",
    ...props
}) {
    const src = imageSrc || "/competition-placeholder.svg";
    const alt = imageSrc ? name : "Competition logo";

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
            <div className="p-2">{name}</div>
        </Card>
    );
}
