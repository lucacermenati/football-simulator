import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TeamLogo from "../Teams/Components/TeamLogo";

export default function CompetitionStandings({ competition, standings }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="grid grid-cols-[1fr_auto_auto_auto] gap-y-4 gap-x-2 px-8 py-4">
                    <div>Team</div>
                    <div>M</div>
                    <div>G</div>
                    <div className="font-semibold">Pts</div>
                    {standings.map((team, index) => (
                        <>
                            <div className="flex justify-start items-center space-x-2">
                                <span>{index + 1}</span>
                                <TeamLogo team={team} size={6} />
                                <span>{team.name}</span>
                            </div>
                            <div>{team.matches}</div>
                            <div>{team.goals}</div>
                            <div className="font-semibold">{team.points}</div>
                        </>
                    ))}
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
