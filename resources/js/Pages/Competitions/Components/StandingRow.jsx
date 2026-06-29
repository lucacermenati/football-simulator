import TeamLogo from "@/Pages/Teams/Components/TeamLogo";
import clsx from "clsx";

export default function StandingRow({ team, position }) {
    return (
        <div
            className={clsx(
                "grid col-span-4 py-4 border-b border-gray-200 grid-cols-subgrid last:border-b-0",
                [1, 2, 3, 4].includes(position) && "bg-blue-100",
                [5, 6].includes(position) && "bg-yellow-100",
                [7].includes(position) && "bg-green-100",
                [18, 17, 16].includes(position) && "bg-red-100",
                [15, 14].includes(position) && "bg-orange-100",
            )}
        >
            <div className="flex justify-start items-center space-x-2">
                <span>{position}</span>
                <TeamLogo team={team} size={6} />
                <span>{team.name}</span>
            </div>
            <div>{team.matches}</div>
            <div>{team.goals}</div>
            <div className="font-semibold">{team.points}</div>
        </div>
    );
}
