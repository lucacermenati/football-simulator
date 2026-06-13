import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionStandings({ competition, standings }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <pre>{JSON.stringify(standings, null, 2)}</pre>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
