import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link } from "@inertiajs/react";
import CompetitionCard from "@/Pages/Competitions/Components/CompetitionCard";
import AddCard from "@/Components/Cards/AddCard";
import Modal from "@/Components/Modal";
import { useState } from "react";
import CompetitionForm from "./Components/CompetitionForm";
import PrimaryButton from "@/Components/PrimaryButton";

export default function CompetitionsIndex({ competitions }) {
    const [isModalOpen, setIsModalOpen] = useState(false);

    return (
        <AuthenticatedLayout>
            <Head title="Competitions" />
            <div className="py-12">
                <div className="flex items-center mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between items-center mx-auto space-x-28">
                        <Link href={competitions.links.prev ?? "#"}>
                            <PrimaryButton
                                disabled={competitions.links.prev === null}
                            >
                                PREV
                            </PrimaryButton>
                        </Link>
                        <div className="grid grid-cols-4 gap-4">
                            {competitions.data.map((competition) => (
                                <Link
                                    key={competition.id}
                                    href={route(
                                        "competitions.show",
                                        competition,
                                    )}
                                >
                                    <CompetitionCard
                                        key={competition.id}
                                        competition={competition}
                                    />
                                </Link>
                            ))}
                            <AddCard
                                key="add-competition"
                                onClick={() => setIsModalOpen(true)}
                            />
                        </div>
                        <Link href={competitions.links.next ?? "#"}>
                            <PrimaryButton
                                disabled={competitions.links.next === null}
                            >
                                NEXT
                            </PrimaryButton>
                        </Link>
                    </div>
                </div>
            </div>
            <Modal show={isModalOpen}>
                <CompetitionForm
                    url={route("competitions.store")}
                    method="post"
                    cancelText="Cancel"
                    submitText="Create"
                    title="Create Competition"
                    description="Fill in all required fields to create a new competition."
                    onCancel={() => setIsModalOpen(false)}
                    onSuccess={() => setIsModalOpen(false)}
                />
            </Modal>
        </AuthenticatedLayout>
    );
}
