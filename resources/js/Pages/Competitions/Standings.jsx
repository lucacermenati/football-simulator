import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import StandingTable from "./Components/StandingTable";

export default function CompetitionStandings({ competition, standings }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="px-8 py-8">
                    <StandingTable
                        standings={standings}
                        competition={competition}
                        onTeamClick={(teamId) => {
                            console.log(
                                `clicked on ${teamId}, go to competition team view page`,
                            );
                        }}
                    />
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
