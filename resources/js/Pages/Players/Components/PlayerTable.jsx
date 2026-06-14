import Actions from "@/Components/Actions";
import Edit from "@/Icons/Edit";
import PlusCircle from "@/Icons/PlusCircle";
import Trash from "@/Icons/Trash";
import View from "@/Icons/View";

export default function PlayerTable({ players, actions = [] }) {
    return (
        <div className="grid grid-cols-2">
            {players.map((player) => (
                <div key={player.id} className="grid grid-cols-2 gap-12 p-3">
                    <div className="flex items-center space-x-4">
                        <img
                            src={`images/flags/${player.nationality}.svg`}
                            alt={player.nationality}
                            className="w-8 h-8 rounded-full border border-lightGrey-600"
                        />
                        <span className="font-medium whitespace-nowrap">
                            {`${player.first_name} ${player.last_name}`}
                        </span>
                    </div>

                    <Actions actions={actions} item={player} />
                </div>
            ))}
        </div>
    );
}
