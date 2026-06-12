import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import Modal from "@/Components/Modal";
import { useState } from "react";
import CompetitionMatchesForm from "./Components/CompetitionMatchesForm";

export default function CompetitionMatches({ competition, day, matches }) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                {(matches.length && (
                    <div className="p-6 text-gray-900">
                        Here will be the matches for day {day}
                        <pre>{JSON.stringify(matches, null, 2)}</pre>
                    </div>
                )) || (
                    <div className="flex justify-center items-center p-16">
                        <PrimaryButton onClick={() => setIsModalOpen(true)}>
                            Generate matches
                        </PrimaryButton>
                    </div>
                )}
            </CompetitionLayout>
            <Modal show={isModalOpen} onClose={() => setIsModalOpen(false)}>
                <CompetitionMatchesForm
                    competition={competition}
                    onCancel={() => setIsModalOpen(false)}
                />
            </Modal>
        </AuthenticatedLayout>
    );
}
