import TeamLogo from "@/Pages/Teams/Components/TeamLogo";
import clsx from "clsx";

export default function StandingRow({ team, position }) {
    return (
        <div
            //TODO: make this a configurable in competition settings
            className={clsx(
                "grid col-span-9 py-4 border-b border-gray-200 grid-cols-subgrid last:border-b-0 pl-4",
                [1, 2, 3, 4].includes(position) &&
                    "border-l-2 border-l-blue-500",
                [5, 6].includes(position) && "border-l-2 border-l-yellow-500",
                [7].includes(position) && "border-l-2 border-l-green-500",
                [15, 14].includes(position) && "border-l-2 border-l-orange-400",
                [18, 17, 16].includes(position) &&
                    "border-l-2 border-l-red-500",
            )}
        >
            <div className="flex justify-start items-center space-x-2">
                <span>{position}</span>
                <TeamLogo team={team} size={6} />
                <span>{team.name}</span>
            </div>
            <div className="px-4">{team.matches}</div>
            <div className="px-4">{team.win}</div>
            <div className="px-4">{team.draw}</div>
            <div className="px-4">{team.loss}</div>
            <div className="px-4">{team.goals}</div>
            <div className="px-4">{team.goals_against}</div>
            <div className="px-4">{team.goal_difference}</div>
            <div className="px-4 font-semibold text-primaryRed-700">
                {team.points}
            </div>
        </div>
    );
}
