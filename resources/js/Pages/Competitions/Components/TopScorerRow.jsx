import PositionIndicator from "@/Components/PositionIndicator";
import TeamLogo from "@/Pages/Teams/Components/TeamLogo";

export default function TopScorerRow({
    player,
    index,
    onTeamClick,
    onPlayerClick,
}) {
    return (
        <div className="grid col-span-3 py-4 pl-4 border-b border-gray-200 grid-cols-subgrid last:border-b-0">
            <div className="flex justify-start items-center space-x-2">
                <span>{index + 1}</span>
                <PositionIndicator size={6} position={player.position} />
                <span
                    className="cursor-pointer hover:underline"
                    onClick={() => onPlayerClick(player.id)}
                >
                    {player.first_name} {player.last_name}
                </span>
            </div>
            <div className="flex justify-start items-center space-x-2">
                <TeamLogo team={player.team} size={6} />
                <span
                    className="cursor-pointer hover:underline"
                    onClick={() => onTeamClick(player.team.id)}
                >
                    {player.team.name}
                </span>
            </div>
            <div className="font-semibold">{player.goals}</div>
        </div>
    );
}
