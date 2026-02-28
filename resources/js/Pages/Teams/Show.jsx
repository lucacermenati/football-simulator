import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamLayout from "./Components/TeamLayout";

export default function TeamShow({ team }) {
    return (
        <AuthenticatedLayout>
            <Head title={`${team.name} - Details`} />
            <TeamLayout team={team}>
                <div className="p-6">
                    <h1 className="mb-4 text-xl font-bold text-primaryRed-600">
                        The history of {team.name}
                    </h1>
                    <p className="text-gray-900">{team.history}</p>
                </div>
            </TeamLayout>
        </AuthenticatedLayout>
    );
}
