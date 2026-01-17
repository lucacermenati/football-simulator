import PrimaryButton from "@/Components/PrimaryButton";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import { useState } from "react";
import Modal from "@/Components/Modal";
import CompetitionForm from "./Components/CompetitionForm";
import SecondaryButton from "@/Components/SecondaryButton";

export default function CompetitionShow({ competition }) {
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between mt-2 mb-6">
                        <div className="flex space-x-4">
                            <img
                                src={competition.logo}
                                alt={competition.name}
                                className="object-cover w-32 h-32 rounded-lg"
                            />
                            <div className="flex flex-col">
                                <Link
                                    className="pt-2 text-2xl font-bold text-darkGrey-600 hover:underline"
                                    href={route(
                                        "competitions.show",
                                        competition.id,
                                    )}
                                >
                                    {competition.name}
                                </Link>
                                <div className="p-2 mt-auto space-x-4 text-darkGrey-600">
                                    <Link
                                        className="hover:underline"
                                        href={route(
                                            "competitions.standings",
                                            competition.id,
                                        )}
                                    >
                                        Standings
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route(
                                            "competitions.scorers",
                                            competition.id,
                                        )}
                                    >
                                        Top Scorers
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route(
                                            "competitions.show",
                                            competition.id,
                                        )}
                                    >
                                        Matches
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route(
                                            "competitions.show",
                                            competition.id,
                                        )}
                                    >
                                        Teams
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <div className="grid grid-cols-2 gap-4">
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsEditModalOpen(true)}
                            >
                                EDIT
                            </PrimaryButton>
                            <PrimaryButton
                                className="self-start"
                                onClick={() => setIsDeleteModalOpen(true)}
                            >
                                DELETE
                            </PrimaryButton>
                        </div>
                    </div>
                    <div className="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">TOP SCORERS</div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
