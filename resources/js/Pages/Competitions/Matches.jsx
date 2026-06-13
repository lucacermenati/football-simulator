import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import CompetitionLayout from "./Components/CompetitionLayout";
import { Head } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import Modal from "@/Components/Modal";
import { useState } from "react";
import CompetitionMatchesForm from "./Components/CompetitionMatchesForm";
import MatchCard from "./Components/MatchCard";

export default function CompetitionMatches({ competition, day, matches }) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    return (
        <AuthenticatedLayout>
            <Head title="Competition Details" />
            <CompetitionLayout competition={competition}>
                {(matches.length && (
                    <div className="grid grid-cols-2 p-2">
                        {matches.map((match) => (
                            <MatchCard key={match.id} match={match} />
                        ))}
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
