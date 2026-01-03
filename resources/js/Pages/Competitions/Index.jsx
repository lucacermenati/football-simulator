import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import CompetitionCard from "@/Pages/Competitions/Components/CompetitionCard";
import AddCard from "@/Components/Cards/AddCard";
import Modal from "@/Components/Modal";
import { useState } from "react";
import CreateCompetitionForm from "./Components/CreateCompetitionForm";

export default function CompetitionsIndex({ competitions }) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    return (
        <AuthenticatedLayout>
            <Head title="Competitions" />

            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="grid grid-cols-4 gap-4">
                        {competitions.map((competition) => (
                            <Link
                                href={route("competitions.show", competition)}
                            >
                                <CompetitionCard
                                    key={competition.id}
                                    name={competition.name}
                                    imageSrc={competition.logo}
                                />
                            </Link>
                        ))}
                        <AddCard
                            key="add-competition"
                            onClick={() => setIsModalOpen(true)}
                        />
                    </div>
                </div>
            </div>
            <Modal show={isModalOpen}>
                <CreateCompetitionForm onCancel={() => setIsModalOpen(false)} />
            </Modal>
        </AuthenticatedLayout>
    );
}
