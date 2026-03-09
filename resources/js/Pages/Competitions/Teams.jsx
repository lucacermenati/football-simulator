import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import TeamTable from "../Teams/Components/TeamTable";

export default function CompetitionShow({ competition }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-6 text-gray-900">
                    {competition.teams && competition.teams.length > 0 ? (
                        <TeamTable
                            teams={competition.teams}
                            actions={[
                                {
                                    icon: "view",
                                    onClick: (team) => {
                                        // TODO: Implement view team competition details
                                        console.log(
                                            "View team competition details:",
                                            team,
                                        );
                                    },
                                },
                                {
                                    icon: "remove",
                                    onClick: (team) => {
                                        // TODO: Implement remove team from competition
                                        console.log("Remove team:", team);
                                    },
                                },
                            ]}
                        />
                    ) : (
                        <p>No teams in this competition</p>
                    )}
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
