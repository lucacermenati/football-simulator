import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionShow({ competition }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex gap-4 items-center mb-6">
                        <img
                            src={competition.logo}
                            alt={competition.name}
                            className="object-cover w-32 h-32 rounded-lg"
                        />
                        <h1 className="text-2xl font-bold text-darkGrey-600">
                            {competition.name}
                        </h1>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <pre>{JSON.stringify(competition, null, 2)}</pre>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
