import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionScorers({ competition, scorers }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-6 text-gray-900">
                    <pre>{JSON.stringify(scorers, null, 2)}</pre>
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
