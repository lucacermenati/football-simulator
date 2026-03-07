import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionShow({ competition }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-6 text-gray-900">
                    {competition.teams?.length > 0 ? (
                        <ul>
                            {competition.teams.map((team) => (
                                <li key={team.id}>{team.name}</li>
                            ))}
                        </ul>
                    ) : (
                        <p>No teams in this competition</p>
                    )}
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
