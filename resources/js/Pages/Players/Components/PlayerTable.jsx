import Actions from "@/Components/Actions";
import Flag from "@/Components/Flag";
import * as Flags from "country-flag-icons/react/3x2";

export default function PlayerTable({ players, actions = [] }) {
    return (
        <div className="grid grid-cols-2">
            {players.map((player) => {
                return (
                    <div
                        key={player.id}
                        className="grid grid-cols-[1fr_auto_auto] gap-12 items-center p-3"
                    >
                        <div className="flex items-center space-x-4">
                            <Flag nationality={player.nationality} size={8} />
                            <span className="min-w-0 font-medium truncate">
                                {`${player.first_name} ${player.last_name}`}
                            </span>
                        </div>

                        <div
                            className={`w-5 h-5 rounded-full bg-roleColors-${player.role}`}
                        />

                        <Actions actions={actions} item={player} />
                    </div>
                );
            })}
        </div>
    );
}
