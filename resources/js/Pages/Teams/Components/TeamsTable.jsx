import Card from "@/Components/Cards/Card";
import Edit from "@/Icons/Edit";
import PlusCircle from "@/Icons/PlusCircle";
import Trash from "@/Icons/Trash";
import View from "@/Icons/View";
import LogoPlaceholder from "./TeamLogo";
import TeamLogo from "./TeamLogo";

export default function TeamsTable({ teams }) {
    return (
        <div className="grid grid-cols-2">
            {teams.map((team) => (
                <div key={team.id} className="grid grid-cols-3 gap-12 p-3">
                    <div className="flex space-x-4">
                        <TeamLogo team={team} className="w-8 h-8" />
                        <span className="font-medium truncate">
                            {team.name}
                        </span>
                    </div>

                    <div className="flex space-x-4">
                        <View className="w-6 h-6 text-primaryRed-800" />
                        <Edit className="w-6 h-6 text-primaryRed-800" />
                        <PlusCircle className="w-6 h-6 text-primaryRed-800" />
                        <Trash className="w-6 h-6 text-primaryRed-800" />
                    </div>
                </div>
            ))}
        </div>
    );
}
