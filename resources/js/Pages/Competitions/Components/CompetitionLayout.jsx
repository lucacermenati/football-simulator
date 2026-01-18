import { useState } from "react";
import { Link } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import CompetitionForm from "./CompetitionForm";
import Modal from "@/Components/Modal";

export default function CompetitionLayout({ children, competition }) {
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);

    return (
        <>
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
                                            "competitions.matches.index",
                                            competition.id,
                                        )}
                                    >
                                        Matches
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route(
                                            "competitions.teams.index",
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
                        {children}
                    </div>
                </div>
            </div>
            <Modal show={isEditModalOpen}>
                <CompetitionForm
                    url={route("competitions.update", competition.id)}
                    method="post"
                    cancelText="Cancel"
                    submitText="Update"
                    title="Update Competition"
                    description="Fill in all required fields to update the competition."
                    competition={competition}
                    onCancel={() => setIsEditModalOpen(false)}
                    onSuccess={() => setIsEditModalOpen(false)}
                />
            </Modal>
            <Modal show={isDeleteModalOpen}>
                <p>Are you sure you want to delete this competition?</p>
                <SecondaryButton onClick={() => setIsDeleteModalOpen(false)}>
                    Cancel
                </SecondaryButton>
                <Link
                    method="delete"
                    href={route("competitions.destroy", competition.id)}
                >
                    <PrimaryButton>Delete</PrimaryButton>
                </Link>
            </Modal>
        </>
    );
}
