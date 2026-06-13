import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TeamLogo from "../Teams/Components/TeamLogo";

export default function CompetitionMatch({ competition, match }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="flex justify-between items-center px-6 py-4">
                    <div className="flex justify-between items-center space-x-4">
                        <TeamLogo team={match.home_team} size={16} />
                        <span>{match.home_team.name}</span>
                    </div>
                    <h1>{match.goal_home}</h1>
                    <h1>{match.goal_away}</h1>
                    <div className="flex justify-between items-center space-x-4">
                        <span>{match.away_team.name}</span>
                        <TeamLogo team={match.away_team} size={16} />
                    </div>
                </div>
                <div className="flex flex-col justify-center items-center">
                    <div>{new Date(match.date).toLocaleDateString()}</div>
                    <div>{match.home_team.stadium}</div>
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
