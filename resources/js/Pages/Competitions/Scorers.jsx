import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TeamLogo from "../Teams/Components/TeamLogo";

export default function CompetitionScorers({ competition, scorers }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="grid grid-cols-[1fr_1fr_auto] gap-y-4 gap-x-2 px-8 py-4">
                    <div>Player</div>
                    <div>Club</div>
                    <div className="font-semibold">Goals</div>
                    {scorers.map((player, index) => (
                        <>
                            <div className="flex justify-start items-center space-x-2">
                                <span>{index + 1}</span>
                                <span>
                                    {player.first_name} {player.last_name}
                                </span>
                            </div>
                            <div className="flex justify-start items-center space-x-2">
                                <TeamLogo team={player.team} size={6} />
                                <span>{player.team.name}</span>
                            </div>
                            <div className="font-semibold">{player.goals}</div>
                        </>
                    ))}
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
