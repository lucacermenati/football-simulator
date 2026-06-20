import TeamLogo from "./TeamLogo";
import { useState } from "react";
import { Link } from "@inertiajs/react";
import PrimaryButton from "@/Components/PrimaryButton";
import SecondaryButton from "@/Components/SecondaryButton";
import Modal from "@/Components/Modal";
import TeamEdit from "./TeamEdit";
import TeamDelete from "./TeamDelete";

export default function TeamLayout({ children, team }) {
    const [isEditModalOpen, setIsEditModalOpen] = useState(false);
    const [isDeleteModalOpen, setIsDeleteModalOpen] = useState(false);

    return (
        <>
            <div className="py-12">
                <div className="mx-auto max-w-7xl sm:px-6 lg:px-8">
                    <div className="flex justify-between mt-2 mb-6">
                        <div className="flex space-x-4">
                            <Link href={route("teams.show", { team: team.id })}>
                                <TeamLogo team={team} size={32} />
                            </Link>
                            <div className="flex flex-col">
                                <Link
                                    className="pt-2 text-2xl font-bold text-darkGrey-600 hover:underline"
                                    href={route("teams.show", {
                                        team: team.id,
                                    })}
                                >
                                    {team.name}
                                </Link>
                                <div className="p-2 mt-auto space-x-4 text-darkGrey-600">
                                    <Link
                                        className="hover:underline"
                                        href={route("teams.info", {
                                            team: team.id,
                                        })}
                                    >
                                        Info
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route("teams.players", {
                                            team: team.id,
                                        })}
                                    >
                                        Players
                                    </Link>
                                    <Link
                                        className="hover:underline"
                                        href={route("teams.lineup", {
                                            team: team.id,
                                        })}
                                    >
                                        Lineup
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
                <TeamEdit
                    team={team}
                    onCancel={() => setIsEditModalOpen(false)}
                    onSuccess={() => setIsEditModalOpen(false)}
                />
            </Modal>
            <Modal show={isDeleteModalOpen}>
                <TeamDelete
                    team={team}
                    onCancel={() => setIsDeleteModalOpen(false)}
                    onSuccess={() => setIsDeleteModalOpen(false)}
                />
            </Modal>
        </>
    );
}
