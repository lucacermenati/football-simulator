import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamLayout from "./Components/TeamLayout";

export default function TeamShow({ team }) {
    return (
        <AuthenticatedLayout>
            <Head title={`${team.name} - Details`} />
            <TeamLayout team={team}>
                <div className="p-6 text-gray-900">{team.history}</div>
            </TeamLayout>
        </AuthenticatedLayout>
    );
}
