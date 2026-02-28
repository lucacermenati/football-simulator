import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionShow({ competition }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                <div className="p-6">
                    <h1 className="mb-4 text-xl font-bold text-primaryRed-600">
                        The history of {competition.name}
                    </h1>
                    <p className="text-gray-900">{competition.description}</p>
                </div>
            </CompetitionLayout>
        </AuthenticatedLayout>
    );
}
