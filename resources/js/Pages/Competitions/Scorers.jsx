import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TopScorerTable from "./Components/TopScorerTable";

export default function CompetitionScorers({ competition, scorers }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="px-8 py-8">
                    <TopScorerTable
                        competition={competition}
                        scorers={scorers}
                        onTeamClick={(teamId) =>
                            console.log(
                                `Clicked on ${teamId} go to competition/team view page`,
                            )
                        }
                        onPlayerClick={(playerId) =>
                            console.log(
                                `Clicked on ${playerId} go to competition/player view page`,
                            )
                        }
                    />
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
