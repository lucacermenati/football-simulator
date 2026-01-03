import Card from "@/Components/Cards/Card";
import PlusCircle from "@/Icons/PlusCircle";

export default function AddCard({
    onClick,
    iconClassName = "w-16 h-16 text-primaryRed-600",
    children,
    className = "",
    ...props
}) {
    return (
        <Card
            onClick={onClick}
            className={"justify-center items-center " + className}
            {...props}
        >
            <PlusCircle className={iconClassName} />
            {children}
        </Card>
    );
}
