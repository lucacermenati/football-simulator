import Edit from "@/Icons/Edit";
import PlusCircle from "@/Icons/PlusCircle";
import Trash from "@/Icons/Trash";
import View from "@/Icons/View";

export default function PlayerTable({ players }) {
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

                    <div className="flex space-x-4">
                        <View
                            title="View"
                            className="w-6 h-6 text-primaryRed-800"
                        />
                        <Edit
                            title="Edit"
                            className="w-6 h-6 text-primaryRed-800"
                        />
                        <PlusCircle
                            title="Add to a competition"
                            className="w-6 h-6 text-primaryRed-800"
                        />
                        <Trash
                            title="Delete"
                            className="w-6 h-6 text-primaryRed-800"
                        />
                    </div>
                </div>
            ))}
        </div>
    );
}
