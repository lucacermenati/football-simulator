import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionsIndex({ competitions }) {
    return (
        <AuthenticatedLayout
            header={
                <h2 className="text-xl font-semibold leading-tight text-gray-800">
                    Competitions
                </h2>
            }
        >
            <Head title="Competitions" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="grid grid-cols-4 gap-4">
                        {competitions.map((competition) => (
                            <div
                                key={competition.id}
                                className="flex overflow-hidden flex-col bg-white shadow-sm sm:rounded-lg"
                            >
                                <img
                                    src={
                                        competition.logo ||
                                        "/competition-placeholder.svg"
                                    }
                                    alt={
                                        competition.logo
                                            ? competition.name
                                            : "Competition logo"
                                    }
                                    className="object-cover w-full h-32"
                                />
                                <div>{competition.name}</div>
                            </div>
                        ))}
                        <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            Add a competition
                        </div>
                    </div>
                    {/* <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg"> */}
                    {/* <div className="p-6 text-gray-900"> */}
                    {/* </div> */}
                    {/* </div> */}
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
