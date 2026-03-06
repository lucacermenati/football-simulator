import Actions from "@/Components/Actions";
import TeamLogo from "./TeamLogo";
import { Link } from "@inertiajs/react";

export default function TeamTable({ teams, actions = [] }) {
    return (
        <div className="grid grid-cols-2">
            {teams.map((team) => (
                <div key={team.id} className="grid grid-cols-2 gap-12 p-3">
                    <div className="flex items-center space-x-4">
                        <TeamLogo team={team} className="w-8 h-8" />
                        <Link
                            className="font-medium whitespace-nowrap hover:underline"
                            href={route("teams.show", {
                                team: team.id,
                            })}
                        >
                            <span>{team.name}</span>
                        </Link>
                    </div>
                    <Actions actions={actions} item={team} />
                </div>
            ))}
        </div>
    );
}
