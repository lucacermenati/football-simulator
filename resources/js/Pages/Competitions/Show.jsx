import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";

export default function CompetitionShow({ competition }) {
    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex items-center mb-6 space-x-4 border border-blue-600">
                        <img
                            src={competition.logo}
                            alt={competition.name}
                            className="object-cover w-32 h-32 rounded-lg border border-green-600"
                        />
                        <div className="border border-red-600">
                            <h1 className="text-2xl font-bold text-darkGrey-600">
                                {competition.name}
                            </h1>
                            <div className="flex-1 p-2 text-white bg-primaryRed-600">
                                COMPETITION SUBMENU PLACEHOLDER
                            </div>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            {competition.description}
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
