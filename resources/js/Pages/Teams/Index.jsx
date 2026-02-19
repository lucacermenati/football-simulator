import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import TeamTable from "./Components/TeamTable";
import TextInput from "@/Components/TextInput";

export default function TeamsIndex({ teams }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Teams
                </h2>
            }
        >
            <Head title="Teams" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center mt-2 mb-6">
                        <TextInput
                            className="w-64"
                            placeholder="Search teams..."
                        />
                        <div className="grid grid-cols-2 gap-4">
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsEditModalOpen(true)}
                            >
                                Create Team
                            </PrimaryButton>
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsDeleteModalOpen(true)}
                            >
                                Generate Teams
                            </PrimaryButton>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {teams.data.length > 0 ? (
                                <TeamTable teams={teams.data} />
                            ) : (
                                <div>
                                    <h1 className="mb-4 text-xl font-semibold">
                                        Your world needs its first team
                                    </h1>
                                    <p>
                                        There are no teams in your universe yet.
                                        Create one from scratch and shape its
                                        identity, or let the factory generate a
                                        team for you to get started quickly.
                                    </p>
                                </div>
                            )}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
