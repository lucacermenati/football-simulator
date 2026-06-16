import Actions from "@/Components/Actions";
import Flag from "@/Components/Flag";
import TeamLogo from "@/Pages/Teams/Components/TeamLogo";

export default function PlayerTable({ players, actions = [] }) {
    return (
        // Can I put a vertical grey line between this two columns? and how?
        <div className="grid relative grid-cols-2">
            <div className="absolute top-0 bottom-0 left-1/2 w-px bg-lightGrey-600" />
            {players.map((player) => {
                return (
                    <div
                        key={player.id}
                        className="grid grid-cols-[1fr_auto_auto] gap-12 items-center p-3 px-6"
                    >
                        <div className="flex items-center space-x-4">
                            <Flag nationality={player.nationality} size={8} />
                            <div
                                className={`w-6 h-6 rounded-full bg-roleColors-${player.role}`}
                            />
                            <span className="overflow-hidden min-w-0 font-medium">
                                {`${player.first_name} ${player.last_name}`}
                            </span>
                        </div>

                        <div className="flex items-center space-x-4">
                            {player.team ? (
                                <TeamLogo team={player.team} size={5} />
                            ) : (
                                <div className="w-5 h-5 rounded-full bg-lightGrey-600" />
                            )}
                        </div>

                        <Actions actions={actions} item={player} />
                    </div>
                );
            })}
        </div>
    );
}
